<?php

namespace App;

abstract class Controller
{
    protected function success($data, string $message = ''): array
    {
        $response = [
            'success' => true,
            'data' => $data,
        ];

        if ($message) {
            $response['message'] = $message;
        }

        return $response;
    }

    protected function error(string $message, int $code = 400): array
    {
        http_response_code($code);
        
        return [
            'success' => false,
            'message' => $message,
        ];
    }

    protected function paginate(array $data, int $page, int $perPage, int $total): array
    {
        return [
            'success' => true,
            'data' => $data,
            'pagination' => [
                'page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'total_pages' => ceil($total / $perPage),
            ],
        ];
    }

    protected function getBody(): array
    {
        $input = file_get_contents('php://input');
        return json_decode($input, true) ?? [];
    }

    protected function getQueryParams(): array
    {
        return $_GET;
    }
}