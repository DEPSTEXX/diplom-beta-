export interface Booking {
    id: number;
    user_id: number;
    product_id: number;
    location_id: number;
    date: string;
    time_slot: string;
    status: 'pending' | 'confirmed' | 'completed' | 'cancelled';
    created_at: string;
}
export interface TimeSlot {
    id: number;
    location_id: number;
    start_time: string;
    end_time: string;
    max_capacity: number;
    is_available: boolean;
}
//# sourceMappingURL=booking.d.ts.map