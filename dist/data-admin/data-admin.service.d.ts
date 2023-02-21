import { Repository } from 'typeorm';
import { Admin } from './data-admin.entity';
import { dataBaru } from './data-admin.dto';
export declare class DataAdminService {
    protected dataAdmin: Repository<Admin>;
    constructor(dataAdmin: Repository<Admin>);
    LihatData(): Promise<Admin[]>;
    LihatPerData(id: number): Promise<Admin>;
    create(data: dataBaru): Promise<Admin>;
    update(id: number, data: Partial<dataBaru>): Promise<import("typeorm").UpdateResult>;
    delete(id: number): Promise<{
        status: boolean;
    }>;
    IniJugaService(): Promise<string>;
    IniService(): string;
}
