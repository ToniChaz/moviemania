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
  //datosErroneos: string = '*Credenciales incorrectas*';
  datosErroneos: string = '';


  constructor(private http: HttpClient, private router: Router) { } // Inyecta HttpClient en el constructor

  login() {
    // Verificar si el nombre de usuario y la contraseña están presentes
    if (this.username && this.password) {
      // Crear un objeto con los datos de inicio de sesión
      const credentials = {
        username: this.username,
        password: this.password
      };
      /*El host es eso: http://localhost:8080 y Ahh la URL es http://localhost:8080/users
      meter esto en algun lado */
      // Enviar datos al backend utilizando HttpClient

      this.http.post<any>('http://localhost:8080/api/login', credentials).subscribe(
        (response: User[]) => {
          console.log('Respuesta del backend:', response);

          if (response[0].isAdmin) {
            this.router.navigate(['/user-list']);
          }
          else {
            this.router.navigate([`/users/${response[0].id}`]);
          }
          // Aquí puedes manejar la respuesta del backend
          //un if si es true se redirige si es false se muestra this.datosErroneos = 'Credenciales incorrectas'
        },
        err => {
          console.error('Error al enviar la solicitud:', err.error.message);
          // Manejar errores aquí
        }
      );
    } else {
      this.inputVacio = 'Debes rellenar esta casilla*';
    }
  }
}