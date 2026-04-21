Write-Host "Starting Yarko Park project..." -ForegroundColor Green
Write-Host ""

Write-Host "Starting Backend (PHP) on port 8000..." -ForegroundColor Yellow
Start-Process -FilePath "cmd.exe" -ArgumentList "/k", "cd apps/backend && php -S localhost:8000 -t public" -WindowStyle Normal

Start-Sleep -Seconds 2

Write-Host "Starting Frontend (Vue) on port 5173..." -ForegroundColor Yellow
Start-Process -FilePath "cmd.exe" -ArgumentList "/k", "cd apps/frontend && npm run dev" -WindowStyle Normal

Start-Sleep -Seconds 2

Write-Host "Starting Admin Panel (Vue) on port 5174..." -ForegroundColor Yellow
Start-Process -FilePath "cmd.exe" -ArgumentList "/k", "cd apps/admin && npm run dev" -WindowStyle Normal

Write-Host ""
Write-Host "All services started!" -ForegroundColor Green
Write-Host "Backend: http://localhost:8000" -ForegroundColor Cyan
Write-Host "Frontend: http://localhost:5173" -ForegroundColor Cyan
Write-Host "Admin: http://localhost:5174" -ForegroundColor Cyan
Write-Host ""
Read-Host "Press Enter to continue"