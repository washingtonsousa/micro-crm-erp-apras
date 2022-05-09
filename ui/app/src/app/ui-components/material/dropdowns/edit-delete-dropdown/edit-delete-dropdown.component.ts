import { Component, Input, Output,EventEmitter } from "@angular/core";

@Component({
  selector: "edit-delete-dropdown",
  template: `
        <div class="btn-group" dropdown>

              <a id="button-split" type="button" dropdownToggle
                      aria-controls="dropdown-split">
                      <i class="fas fa-ellipsis"></i>
            </a>

            <ul id="dropdown-split" *dropdownMenu class="dropdown-menu"
                role="menu" aria-labelledby="button-split">


                <li role="menuitem"><a class="dropdown-item pointer" (click)="edit.emit()"> <i class="fas fa-edit"></i>  Editar </a>
                </li>

                <li role="menuitem"><a class="dropdown-item pointer" (click)="delete.emit()"> <i class="fas fa-close"></i>  Deletar </a>
                </li>

            </ul>

      </div>

  `,
})
export class EditDeleteDropDownComponent {

  @Output("edit") edit: EventEmitter<any> = new EventEmitter<any>();
  @Output("delete") delete: EventEmitter<any> = new EventEmitter<any>();

}
