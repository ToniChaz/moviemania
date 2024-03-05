import { Component, isDevMode } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClient, HttpClientModule, HttpErrorResponse } from '@angular/common/http';
import { Router } from '@angular/router';
import { User } from '../users';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule,HttpClientModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  username: string = '';
  password: string = '';
  inputVacio: string = '';
  datosErroneos: string = '';


  constructor(private http: HttpClient, private router: Router) { } // Inyecta HttpClient en el constructor

  login() {
    if (this.username && this.password) {
      const credentials = {
        username: this.username,
        password: this.password
      };
      
      this.http.post<any>('http://localhost:8080/api/login', credentials).subscribe(
        (response: User[]) => {
          console.log('Respuesta del backend:', response);

          if (response[0].isAdmin) {
            this.router.navigate(['/admin']);
          }
          else{
            this.router.navigate([`/users/${response[0].id}`]);
          }
        },
        err => {
          console.error('las credenciales son incorrectas', err.error.message);
          this.datosErroneos =('*Credenciales incorrectas*');
        }
      );
    } else {
      this.inputVacio = 'Debes rellenar esta casilla*';
    }
  }
}