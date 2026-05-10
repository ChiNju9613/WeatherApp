# 🌦 Laravel Weather App

A simple and responsive Weather Application built using Laravel and OpenWeatherMap API.
This project allows users to search for any city and view real-time weather information including temperature, humidity, weather condition, and dynamic weather icons.

## 🚀 Features

* Search weather by city name
* Real-time weather data using OpenWeatherMap API
* Dynamic weather emojis/icons
* Clean and responsive UI
* Laravel MVC architecture
* Service class implementation
* Form validation
* API integration using Laravel HTTP Client

## 🛠 Technologies Used

* Laravel 12
* PHP 8
* Blade Template Engine
* HTML5
* CSS3
* OpenWeatherMap API

## 📂 Project Structure

* Controller for request handling
* Service class for API communication
* Blade views for frontend UI
* Environment configuration using `.env`

## ⚙️ Installation

1. Clone the repository
2. Install dependencies

```bash
composer install
```

3. Create `.env` file

```bash
cp .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Add your OpenWeatherMap API key in `.env`

```env
OPENWEATHER_API_KEY=your_api_key
```

6. Run the application

```bash
php artisan serve
```

## 🌐 API Used

OpenWeatherMap API
https://openweathermap.org/api

## 📸 Preview

Displays:

* Temperature
* Humidity
* Weather condition
* Dynamic weather icons

## 📚 Learning Outcomes

This project helped in understanding:

* Laravel routing
* Controllers
* Service classes
* Dependency Injection
* API integration
* Blade templating
* Form handling and validation

## 👨‍💻 Author

Developed as a Laravel practice project for learning real-world API integration and clean project structure.
