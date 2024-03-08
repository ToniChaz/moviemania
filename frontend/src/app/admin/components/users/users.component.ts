import { Component, OnDestroy } from '@angular/core';
import { User } from '../../../models/users';
import { UserService } from '../../../services/user.service';
import { Observable, Subscription, lastValueFrom } from 'rxjs';
import { TableLazyLoadEvent } from 'primeng/table';
import { LazyResult } from '../../../models/lazyLoadResult';
// hmm esto se importa en el main module?

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrl: './users.component.css',
})
export class UsersComponent implements OnDestroy {

  private subscriptions: Subscription;
  totalRecords: number = 0;
  users$: Observable<LazyResult<User>>;
  users: User[];
  skipRows: number;
  pageSize: number;
  loading: boolean | undefined;
  checked: boolean | null;
  userBackUp: any;
  filters: any = {
    id: null,
    username: null,
    name: null,
    birthdate: null,
    email: null,
    isAdmin: null
  };

  lazyObj: any = {
  }
  deleting: any;

  constructor(private userService: UserService) {
    this.subscriptions = Subscription.EMPTY;
    this.checked = null;
    this.skipRows = 0;
    this.pageSize = 5;
    this.users$ = this.userService.getUsersLazy(this.skipRows, this.pageSize, this.filters);
    this.users = [];
  }

  ngOnDestroy(): void {
    this.subscriptions.unsubscribe();
  }

  pageChange($event: TableLazyLoadEvent) {
    let filter: any = $event.filters || null;
    this.filters.id = filter.id?.value || null;
    this.filters.username = filter.username?.value || null;
    this.filters.name = filter.name?.value || null;
    this.filters.birthdate = filter.birthdate?.value || null;
    this.filters.email = filter.email?.value || null;
    this.filters.isAdmin = filter.isAdmin?.value == null ? null : +filter.isAdmin?.value;

    this.lazyObj.filters = this.filters;
    this.lazyObj.order = {
      sortField: $event.sortField || null,
      sortOrder: $event.sortOrder == 1 ? "ASC" : "DESC"
    };
    this.lazyObj.pagination = {
      pageSize: $event.rows || this.pageSize,
      skipRows: $event.first || this.skipRows
    }

    this.users$ = this.userService.getUsersLazy($event.first || this.skipRows, $event.rows || this.pageSize, this.lazyObj);

    this.getUsers();

  }

  onRowEditInit(user: User) {
    console.log("Iniciando la modificación del user " + user.username);
    this.userBackUp = user;
  }

  onRowEditSave(user: User) {
    let update$ = this.userService.updateUser(user);
    lastValueFrom(update$)
      .then(() => {
        console.log("Se actualizó correctamente");
        this.getUsers();
      })
      .catch(() => {
        console.error("Ocurrió un error al actualizar");
      });
  }

  onRowEditCancel() {
    delete this.userBackUp;
    this.getUsers();
  }

  onRowDeleteInit(user: User) {
    this.deleting = true;
    console.log("Iniciando el borrado del user " + user.username);
  }

  onRowDeleteSave(user: User) {
    let delete$ = this.userService.deleteUser(user.id);

    // this.subscriptions.add(delete$.subscribe({
    //   next: data => {
    //     let result = data;
    //   },
    //   error: err => {
    //   }
    // }));

    lastValueFrom(delete$)
      .then(() => {
        console.log("Se borró correctamente");
        this.deleting = false;
        this.getUsers();
      })
      .catch(() => {
        console.error("Ocurrió un error al borrar");
      });
  }

  private async getUsers() {
    let result = await lastValueFrom(this.users$);
    this.users = result.data;
    this.totalRecords = result.totalRecords;
  }

}
