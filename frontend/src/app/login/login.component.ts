import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClient, HttpClientModule } from '@angular/common/http';

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


  constructor(private http: HttpClient) { } // Inyecta HttpClient en el constructor

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
      this.http.post<any>('http://localhost:8080/users', credentials).subscribe(
        response => {
          console.log('Respuesta del backend:', response);
          // Aquí puedes manejar la respuesta del backend
          //un if si es true se redirige si es false se muestra this.datosErroneos = 'Credenciales incorrectas'
        },
        error => {
          console.error('Error al enviar la solicitud:', error);
          // Manejar errores aquí
        }
      );
    } else {
      this.inputVacio = 'Debes rellenar esta casilla*';
    }
  }
}