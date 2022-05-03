export class PaginationReponse<T> {

    public items!: T[];
    public page!: number;
    public totalItems!: number;
    public totalPages!: number;

}
