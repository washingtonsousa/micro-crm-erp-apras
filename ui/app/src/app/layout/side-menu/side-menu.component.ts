import { Component, ElementRef, HostListener, OnInit } from "@angular/core";

@Component({
    selector: "side-menu",
    templateUrl: "side-menu.component.html",
    styleUrls: ["side-menu.scss"]
})
export class SideMenuComponent implements OnInit{

  constructor(private el:ElementRef) {

  }
  ngOnInit(): void {
  }


  public Show() {

      let element = this.el.nativeElement;
      let sideMenu = element.querySelector(".side-menu");

      if(!sideMenu.classList.contains("side-menu-show"))
      element.querySelector(".side-menu").classList.add("side-menu-show");

  }

  public Hide() {

    let element = this.el.nativeElement;
    let sideMenu = element.querySelector(".side-menu");

    if(sideMenu.classList.contains("side-menu-show"))
    element.querySelector(".side-menu").classList.remove("side-menu-show");

  }

  public Toggle() {

    let element = this.el.nativeElement;
    let sideMenu = element.querySelector(".side-menu");

    if(sideMenu.classList.contains("side-menu-show"))
    element.querySelector(".side-menu").classList.remove("side-menu-show")
    else
    element.querySelector(".side-menu").classList.add("side-menu-show")

  }

  @HostListener('document:click', ['$event'])
  public ClickOutSide(event: any) {

    let element = this.el.nativeElement;

    if(!element.contains(event.target)
              &&
    !event.target.classList.contains("side-menu-toggler"))

      this.Hide();

  }


}
