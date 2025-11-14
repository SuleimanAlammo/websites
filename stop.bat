@echo off
echo ========================================
echo Stopping Delta Team Three Containers
echo ========================================
echo.

docker-compose down

if errorlevel 1 (
    echo.
    echo ERROR: Failed to stop containers.
    echo.
    pause
    exit /b 1
)

echo.
echo ========================================
echo Containers stopped successfully!
echo ========================================
echo.
echo Your data has been saved.
echo To start again, run: start.bat
echo.
pause
