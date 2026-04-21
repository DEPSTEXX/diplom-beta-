<?php

use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\LocationController;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;
use App\Controllers\OrderController;
use App\Controllers\BookingController;
use App\Controllers\PromotionController;
use App\Controllers\CertificateController;

// Auth routes
$router->post('/auth/login', [AuthController::class, 'login']);
$router->post('/auth/register', [AuthController::class, 'register']);
$router->post('/auth/logout', [AuthController::class, 'logout']);
$router->get('/auth/me', [AuthController::class, 'me']);

// Location routes
$router->get('/locations', [LocationController::class, 'index']);
$router->get('/locations/{slug}', [LocationController::class, 'show']);

// Category routes
$router->get('/categories', [CategoryController::class, 'index']);
$router->get('/categories/{id}', [CategoryController::class, 'show']);

// Product routes
$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/{id}', [ProductController::class, 'show']);

// Order routes
$router->get('/orders', [OrderController::class, 'index']);
$router->get('/orders/{id}', [OrderController::class, 'show']);
$router->post('/orders', [OrderController::class, 'store']);

// Booking routes
$router->get('/bookings', [BookingController::class, 'index']);
$router->get('/bookings/slots', [BookingController::class, 'availableSlots']);
$router->post('/bookings', [BookingController::class, 'store']);
$router->put('/bookings/{id}/cancel', [BookingController::class, 'cancel']);

// Promotion routes
$router->get('/promotions', [PromotionController::class, 'index']);
$router->get('/promotions/{id}', [PromotionController::class, 'show']);

// Certificate routes
$router->get('/certificates', [CertificateController::class, 'index']);
$router->get('/certificates/{id}', [CertificateController::class, 'show']);

// Admin routes
$router->get('/admin/users', [UserController::class, 'index']);
$router->get('/admin/users/{id}', [UserController::class, 'show']);
$router->put('/admin/users/{id}', [UserController::class, 'update']);
$router->delete('/admin/users/{id}', [UserController::class, 'delete']);

$router->post('/admin/locations', [LocationController::class, 'store']);
$router->put('/admin/locations/{id}', [LocationController::class, 'update']);
$router->delete('/admin/locations/{id}', [LocationController::class, 'delete']);

$router->post('/admin/categories', [CategoryController::class, 'store']);
$router->put('/admin/categories/{id}', [CategoryController::class, 'update']);
$router->delete('/admin/categories/{id}', [CategoryController::class, 'delete']);

$router->post('/admin/products', [ProductController::class, 'store']);
$router->put('/admin/products/{id}', [ProductController::class, 'update']);
$router->delete('/admin/products/{id}', [ProductController::class, 'delete']);

$router->put('/admin/orders/{id}/status', [OrderController::class, 'updateStatus']);

$router->get('/admin/bookings', [BookingController::class, 'adminIndex']);

$router->post('/admin/promotions', [PromotionController::class, 'store']);
$router->put('/admin/promotions/{id}', [PromotionController::class, 'update']);
$router->delete('/admin/promotions/{id}', [PromotionController::class, 'delete']);