import { Component, OnInit } from '@angular/core';
import { Booking, BookingService } from '../booking.service';

@Component({
  selector: 'app-booking-list',
  templateUrl: './booking-list.component.html',
  styleUrls: ['./booking-list.component.css']
})
export class BookingListComponent implements OnInit {
  activeBookings: Booking[] = [];
  deletedBookings: Booking[] = [];
  completedBookings: Booking[] = [];

  constructor(private bookingService: BookingService) { }

  ngOnInit(): void {
    this.getBookings();
  }

  getBookings(): void {
    this.bookingService.getBookings().subscribe((bookings: Booking[]) => {
      const today = new Date(); // Current date
  
      // Filter active and completed bookings
      this.activeBookings = bookings.filter(booking => {
        const departureDate = new Date(booking.departureDate);
        return !booking.deleted && departureDate > today;
      });
  
      // Filter completed bookings
      this.completedBookings = bookings.filter(booking => {
        const departureDate = new Date(booking.departureDate);
        return !booking.deleted && departureDate <= today;
      });
  
      // Filter deleted bookings
      this.deletedBookings = bookings.filter(booking => booking.deleted);
    });
  }
  
  softDeleteBooking(id: number): void {
    this.bookingService.softDeleteBooking(id)
      .subscribe(() => {
        // Remove the booking from active bookings
        this.activeBookings = this.activeBookings.filter(booking => booking.id !== id);
        // Move the booking to deleted bookings if it's not already there
        const deletedBooking = this.completedBookings.find(booking => booking.id === id);
        if (deletedBooking) {
          this.completedBookings = this.completedBookings.filter(booking => booking.id !== id);
          this.deletedBookings.push(deletedBooking);
        }
      });
  }
}
