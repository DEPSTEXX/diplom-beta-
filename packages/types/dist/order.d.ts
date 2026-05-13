export interface Order {
    id: number;
    user_id: number;
    status: 'pending' | 'confirmed' | 'completed' | 'cancelled';
    total_amount: number;
    created_at: string;
    updated_at: string;
}
export interface OrderItem {
    id: number;
    order_id: number;
    product_id: number;
    quantity: number;
    price: number;
}
//# sourceMappingURL=order.d.ts.map