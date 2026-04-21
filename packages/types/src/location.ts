export interface Location {
  id: number;
  name: string;
  slug: string;
  description: string;
  address: string;
  phone: string;
  image_url: string;
  is_active: boolean;
}

export interface Promotion {
  id: number;
  title: string;
  description: string;
  image_url: string;
  location_id: number;
  start_date: string;
  end_date: string;
  is_active: boolean;
}