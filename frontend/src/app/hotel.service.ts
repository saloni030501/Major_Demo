import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class HotelService {

  constructor(private http: HttpClient) { }

  searchHotels(city: string, area: string, hotelName: string): Observable<any[]> {
    // Implement your search logic
    return this.http.get<any[]>('your_api_url');
  }
}
