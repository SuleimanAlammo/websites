@echo off
echo ========================================
echo Delta Team Three - WordPress Docker
echo ========================================
echo.

echo Checking if Docker is running...
docker info >nul 2>&1
if errorlevel 1 (
    echo ERROR: Docker is not running!
    echo Please start Docker Desktop and try again.
    echo.
    pause
    exit /b 1
)

echo Docker is running!
echo.

echo Starting WordPress containers...
docker-compose up -d

if errorlevel 1 (
    echo.
    echo ERROR: Failed to start containers.
    echo Check the error messages above.
    echo.
    pause
    exit /b 1
)

echo.
echo ========================================
echo SUCCESS! Containers are starting...
echo ========================================
echo.
echo Please wait 30 seconds for WordPress to initialize.
echo.
echo Then open your browser and go to:
echo   http://localhost:8000
echo.
echo WordPress Admin:
echo   http://localhost:8000/wp-admin
echo.
echo Database Admin (phpMyAdmin):
echo   http://localhost:8080
echo.
echo To stop containers, run: stop.bat
echo ========================================
echo.
pause
