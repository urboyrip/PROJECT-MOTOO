import { DataAdminService } from './data-admin.service';
import { dataBaru } from './data-admin.dto';
export declare class DataAdminController {
    private DataAdminService;
    constructor(DataAdminService: DataAdminService);
    IniController(): string;
    NewRecord(data: dataBaru): Promise<import("./data-admin.entity").Admin>;
    EditRecord(id: number, data: Partial<dataBaru>): Promise<import("typeorm").UpdateResult>;
    DeleteRecord(id: number): Promise<{
        status: boolean;
    }>;
    IniJugaController(): Promise<string>;
    IniDataAdmin(): Promise<import("./data-admin.entity").Admin[]>;
    IniCotrollerPerdata(id: number): Promise<import("./data-admin.entity").Admin>;
    IniControllerID(id: string): string;
    IniIkutController(): string;
}
