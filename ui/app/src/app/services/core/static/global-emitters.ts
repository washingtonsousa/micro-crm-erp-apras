import { EventEmitter } from '@angular/core';

export class GlobalEmitters {

    private static events: EventEmitter<any>[] = [];

        static get(eventName:any) : EventEmitter<any> {

            if(this.events[eventName] == null || this.events[eventName] == undefined) {
                            this.events[eventName] = new EventEmitter<any>();
            }

            return this.events[eventName];
        }

}
