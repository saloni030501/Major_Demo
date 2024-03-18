import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { User } from '../../interfaces/auth';
import { ServicesService } from '../../services/services.service';
import { passwordMatchValidator } from '../../shared/password-match.directive';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrl: './register.component.css'
})
export class RegisterComponent {
  successMessage: string = '';
  errorMessage: string = '';
  registerForm = this.fb.group({
    fullName: ['', [Validators.required, Validators.pattern(/^[a-zA-Z]+(?: [a-zA-Z]+)*$/)]],
    email: ['', [Validators.required, Validators.email]],
    password: ['', Validators.required],
    confirmPassword: ['', Validators.required],
    hasPanCard: [''] ,// Add radio button control
    
  }, {
    validators: passwordMatchValidator
  })

  constructor(
    private fb: FormBuilder,
    private authService: ServicesService,
    private router: Router
  ) { }

  get fullName() {
    return this.registerForm.controls['fullName'];
  }

  get email() {
    return this.registerForm.controls['email'];
  }

  get password() {
    return this.registerForm.controls['password'];
  }

  get confirmPassword() {
    return this.registerForm.controls['confirmPassword'];
  }

  submitDetails() {
    // Check if the user has selected "Yes" for PAN card
    if (this.registerForm.get('hasPanCard')?.value === 'yes') {
      const postData = { ...this.registerForm.value };
      delete postData.confirmPassword;
      delete postData.hasPanCard; // Exclude hasPanCard from form data
      this.authService.registerUser(postData as User).subscribe(
        response => {
          console.log(response);
          this.successMessage = 'Registered successfully';
          this.router.navigate(['login']);
        },
        error => {
          this.errorMessage = 'Something went wrong';
        }
      );
    } else {
      // Display message indicating PAN card information is required
      this.errorMessage = 'Please provide PAN card information to get registered';
    }
  }
}