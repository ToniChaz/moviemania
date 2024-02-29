import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [FormsModule,HttpClientModule],
  templateUrl: './register.component.html',
  styleUrl: './register.component.css'
})
export class RegisterComponent {
  fullName: string = '';
  email: string = '';
  password: string = '';
  birthDate: Date | null = null;
  username: string = '';
  //country: string = '';
  confirmPassword: string = '';
  mensaje : string = '';
  
        
  
/*El host es eso: http://localhost:8080 y Ahh la URL es http://localhost:8080/users
      meter esto en algun lado */
      constructor(private http: HttpClient) { } // Inyecta HttpClient en el constructor

      register() {
        // Aquí puedes implementar la lógica para enviar los datos de registro al backend
        if (this.fullName && this.email && this.password && this.birthDate && this.username && this.confirmPassword /*&& this.country*/) {
          if (this.password === this.confirmPassword) {
            this.mensaje = '';
            const registrationData = {
              fullName: this.fullName,
              email: this.email,
              password: this.password,
              birthDate: this.birthDate,
              username: this.username,
              //country: this.country
            };
    
            this.http.post<any>('http://localhost:8080/users', registrationData).subscribe(
              response => {
                console.log('Respuesta del backend:', response);
                // te manda pa la web
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