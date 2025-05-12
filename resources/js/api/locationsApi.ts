export interface Location {
    code: number;
    name: string;
    image: string;
    creationDate: string;
  }
  
  export async function fetchLocations(): Promise<Location[]> {
    const response = await fetch("/api/locations", {
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": import.meta.env.VITE_API_KEY,
      },
    });
  
    if (!response.ok) {
      throw new Error(`Error: ${response.status}`);
    }
  
    return response.json();
  }
  