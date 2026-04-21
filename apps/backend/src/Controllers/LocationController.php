<?php

namespace App\Controllers;

use App\Controller;
use App\Auth;
use App\Database\Connection;

class LocationController extends Controller
{
    public function index(): array
    {
        $db = Connection::getInstance();
        $stmt = $db->query('SELECT * FROM locations WHERE is_active = 1 ORDER BY id');
        $locations = $stmt->fetchAll();

        return $this->success($locations);
    }

    public function show(string $slug): array
    {
        $db = Connection::getInstance();
        $stmt = $db->prepare('SELECT * FROM locations WHERE slug = ? AND is_active = 1');
        $stmt->execute([$slug]);
        $location = $stmt->fetch();

        if (!$location) {
            return $this->error('Location not found', 404);
        }

        return $this->success($location);
    }

    public function store(): array
    {
        Auth::requireAdmin();
        $body = $this->getBody();

        if (empty($body['name']) || empty($body['slug'])) {
            return $this->error('Name and slug are required');
        }

        $db = Connection::getInstance();
        $stmt = $db->prepare(
            'INSERT INTO locations (name, slug, description, address, phone, image_url, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $body['name'],
            $body['slug'],
            $body['description'] ?? '',
            $body['address'] ?? '',
            $body['phone'] ?? '',
            $body['image_url'] ?? '',
            $body['is_active'] ?? 1,
        ]);

        $id = $db->lastInsertId();
        $stmt = $db->prepare('SELECT * FROM locations WHERE id = ?');
        $stmt->execute([$id]);
        $location = $stmt->fetch();

        return $this->success($location, 'Location created');
    }

    public function update(int $id): array
    {
        Auth::requireAdmin();
        $body = $this->getBody();

        $db = Connection::getInstance();
        $stmt = $db->prepare('SELECT * FROM locations WHERE id = ?');
        $stmt->execute([$id]);
        
        if (!$stmt->fetch()) {
            return $this->error('Location not found', 404);
        }

        $fields = [];
        $values = [];

        if (isset($body['name'])) {
            $fields[] = 'name = ?';
            $values[] = $body['name'];
        }
        if (isset($body['description'])) {
            $fields[] = 'description = ?';
            $values[] = $body['description'];
        }
        if (isset($body['address'])) {
            $fields[] = 'address = ?';
            $values[] = $body['address'];
        }
        if (isset($body['phone'])) {
            $fields[] = 'phone = ?';
            $values[] = $body['phone'];
        }
        if (isset($body['image_url'])) {
            $fields[] = 'image_url = ?';
            $values[] = $body['image_url'];
        }
        if (isset($body['is_active'])) {
            $fields[] = 'is_active = ?';
            $values[] = $body['is_active'];
        }

        if (empty($fields)) {
            return $this->error('No fields to update');
        }

        $values[] = $id;
        $sql = 'UPDATE locations SET ' . implode(', ', $fields) . ' WHERE id = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute($values);

        $stmt = $db->prepare('SELECT * FROM locations WHERE id = ?');
        $stmt->execute([$id]);
        $location = $stmt->fetch();

        return $this->success($location, 'Location updated');
    }

    public function delete(int $id): array
    {
        Auth::requireAdmin();

        $db = Connection::getInstance();
        $stmt = $db->prepare('DELETE FROM locations WHERE id = ?');
        $stmt->execute([$id]);

        return $this->success(null, 'Location deleted');
    }
}