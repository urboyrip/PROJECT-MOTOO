import { Repository } from 'typeorm';
import { dtoTiket } from './tiket.dto';
import { data_tiket_csv } from './tiket.entity';
export declare class TiketService {
    protected dataTiket: Repository<data_tiket_csv>;
    constructor(dataTiket: Repository<data_tiket_csv>);
    LihatData(): Promise<data_tiket_csv[]>;
    LihatPerData(Request_ID: number): Promise<data_tiket_csv>;
    CreateData(data: dtoTiket): Promise<data_tiket_csv>;
    UpdateData(Request_ID: number, data: Partial<dtoTiket>): Promise<import("typeorm").UpdateResult>;
    DeleteData(Request_ID: number): Promise<{
        status: boolean;
    }>;
    CountAllData(): Promise<any>;
    CountDataClosed(): Promise<any>;
    ListDataClosed(): Promise<any[]>;
    CountDataCanceled(): Promise<any>;
    ListDataCanceled(): Promise<any[]>;
    CountDataApproved(): Promise<any>;
    ListDataApproved(): Promise<any[]>;
    CountDataIncident(): Promise<any>;
    ListDataIncident(): Promise<any[]>;
    CountDataRequest(): Promise<any>;
    ListDataRequest(): Promise<any[]>;
    CountIncidentClosed(): Promise<any>;
    CountRequestClosed(): Promise<any>;
    CountSLAPoints(): Promise<any>;
}
