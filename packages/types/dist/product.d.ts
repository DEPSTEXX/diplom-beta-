export interface Category {
    id: number;
    name: string;
    slug: string;
    description: string;
    location_id: number;
    image_url: string;
    is_active: boolean;
}
export interface Product {
    id: number;
    name: string;
    slug: string;
    description: string;
    price: number;
    category_id: number;
    location_id: number;
    image_url: string;
    duration_minutes: number;
    is_active: boolean;
    stock: number;
}
export interface Certificate {
    id: number;
    name: string;
    description: string;
    price: number;
    image_url: string;
    location_id: number;
    is_active: boolean;
}
//# sourceMappingURL=product.d.ts.map