import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [FormsModule, HttpClientModule],
  templateUrl: './register.component.html',
  styleUrl: './register.component.css'
})
export class RegisterComponent {
  fullName: string = '';
  email: string = '';
  password: string = '';
  birthdate: Date | null = null;
  username: string = '';
  confirmPassword: string = '';
  mensaje: string = '';
  dia = '';
  mes = '';
  anio = '';


  // El host es eso: http://localhost:8080 y Ahh la URL es http://localhost:8080/users meter esto en algun lado
  constructor(private http: HttpClient, private router: Router) { } // Inyecta HttpClient en el constructor

  register() {
    // Aquí puedes implementar la lógica para enviar los datos de registro al backend
    if (this.fullName && this.email && this.password && this.birthdate && this.username && this.confirmPassword) {
      if (this.password === this.confirmPassword) {
        this.mensaje = '';

        const registrationData = {
          name: this.fullName,
          email: this.email,
          password: this.password,
          birthdate: this.birthdate,
          username: this.username
        };
        console.log(this.birthdate);

        this.http.post<any>('http://localhost:8080/api/users', registrationData).subscribe(
          response => {
            console.log('Respuesta del backend:', response);
            this.router.navigate([`/users/${response.id}`]);
            // te manda para la web
            // o hacer que te diga el placeholder que ya hay alguien con este nombre o correo o lo que sea
          },
          error => {
            console.error('Error al enviar la solicitud:', error);
          }
        );
      } else {
        this.confirmPassword = '';
        this.mensaje = 'Las contraseñas no coinciden*';

      }
    } else {
      this.mensaje = 'Debes completar este campo.';
    }
  }
}