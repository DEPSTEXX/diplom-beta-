export interface ApiResponse<T> {
    success: boolean;
    data: T;
    message?: string;
}
export interface PaginatedResponse<T> {
    success: boolean;
    data: T[];
    pagination: {
        page: number;
        per_page: number;
        total: number;
        total_pages: number;
    };
}
//# sourceMappingURL=api.d.ts.map