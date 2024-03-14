import { Component } from '@angular/core';
import { HotelService } from '../hotel.service'; 

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrl: './search.component.css'
})
export class SearchComponent {

  city: string = '';
  area: string = '';
  hotelName: string = '';
  searchResults: any[] = [];

  constructor(private hotelService: HotelService) {}

  search() {
    this.hotelService.searchHotels(this.city, this.area, this.hotelName)
      .subscribe((results: any[]) => {
        this.searchResults = results;
      });
  }
  
}
