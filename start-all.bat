@echo off
echo Starting Yarko Park project...
echo.

echo Starting Backend (PHP) on port 8000...
start "Backend" cmd /k "cd apps/backend && php -S 127.0.0.1:8000 -t public"

timeout /t 2 /nobreak > nul

echo Starting Frontend (Vue) on port 5173...
start "Frontend" cmd /k "cd apps/frontend && npm run dev"

timeout /t 2 /nobreak > nul

echo Starting Admin Panel (Vue) on port 5174...
start "Admin" cmd /k "cd apps/admin && npm run dev"

echo.
echo All services started!
echo Backend: http://localhost:8000
echo Frontend: http://localhost:5173
echo Admin: http://localhost:5174
echo.
pause