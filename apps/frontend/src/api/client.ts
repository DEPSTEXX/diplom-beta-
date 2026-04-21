import axios from 'axios'

const api = axios.create({
  baseURL: '/api',
  headers: { 'Content-Type': 'application/json' }
})

api.interceptors.request.use((config) => {
  const token = localStorage.getItem('token')
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})
function showDdosOverlay(durationMs: number) {
  if (document.getElementById('ddos-protection-overlay')) return;
  
  console.error('DDOS Protection Triggered!');
  const overlay = document.createElement('div');
  overlay.id = 'ddos-protection-overlay';
  overlay.style.cssText = 'position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(220, 20, 60, 0.98); z-index: 999999; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white; text-align: center; font-family: sans-serif;';
  
  overlay.innerHTML = `
      <div style="font-size: 80px; margin-bottom: 20px;">🛡️</div>
      <h1 style="margin-bottom: 15px; font-size: 32px; font-weight: bold; text-transform: uppercase;">Внимание: DDOS Защита</h1>
      <p style="font-size: 20px; margin-bottom: 20px; max-width: 80%; line-height: 1.4;">Ваш IP-адрес временно заблокирован из-за слишком большого количества запросов.</p>
      <div style="background: white; color: crimson; padding: 10px 20px; border-radius: 50px; font-weight: bold; font-size: 18px;">
        Блокировка: 10 секунд
      </div>
  `;
  
  const appendOverlay = () => document.body.appendChild(overlay);
  if (document.body) appendOverlay();
  else document.addEventListener('DOMContentLoaded', appendOverlay);

  setTimeout(() => {
    const el = document.getElementById('ddos-protection-overlay');
    if (el) el.remove();
  }, durationMs);
}

// Check if currently blocked and restore overlay from previous F5 reload
const blockUntil = localStorage.getItem('ddos_block_until');
if (blockUntil) {
  const remainingTime = parseInt(blockUntil, 10) - Date.now();
  if (remainingTime > 0) {
    showDdosOverlay(remainingTime);
  } else {
    localStorage.removeItem('ddos_block_until');
  }
}

api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response && error.response.status === 429) {
      if (!localStorage.getItem('ddos_block_until') || parseInt(localStorage.getItem('ddos_block_until')!) < Date.now()) {
        localStorage.setItem('ddos_block_until', (Date.now() + 10000).toString());
        showDdosOverlay(10000);
      }
    }
    return Promise.reject(error);
  }
)

export default api