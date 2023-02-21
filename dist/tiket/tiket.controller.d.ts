import { TiketService } from './tiket.service';
import { dtoTiket } from './tiket.dto';
export declare class TiketController {
    private TiketService;
    constructor(TiketService: TiketService);
    homeTiket(): string;
    getDataTiket(): Promise<import("./tiket.entity").data_tiket_csv[]>;
    getJumlahTiket(): Promise<any>;
    getJumlahClosed(): Promise<any>;
    getListClosed(): Promise<any[]>;
    getJumlahCanceled(): Promise<any>;
    getListCanceled(): Promise<any[]>;
    getJumlahApproved(): Promise<any>;
    getListApproved(): Promise<any[]>;
    getJumlahIncident(): Promise<any>;
    getListIncident(): Promise<any[]>;
    getJumlahRequest(): Promise<any>;
    getListRequest(): Promise<any[]>;
    getSLAPoints(): Promise<any>;
    getIncidentClosed(): Promise<any>;
    getRequestClosed(): Promise<any>;
    getDataTiketByData(id: number): Promise<import("./tiket.entity").data_tiket_csv>;
    postDataTiket(data: dtoTiket): Promise<import("./tiket.entity").data_tiket_csv>;
    updateDataTiket(id: number, data: Partial<dtoTiket>): Promise<import("typeorm").UpdateResult>;
    deleteDataTiket(id: number): Promise<{
        status: boolean;
    }>;
}
