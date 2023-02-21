import { Body, Controller, Get, Param, Post,Put } from '@nestjs/common';
import { TiketService } from './tiket.service';
import { dtoTiket } from './tiket.dto';
import { Delete } from '@nestjs/common/decorators';

@Controller('tiket')
export class TiketController {
    
    constructor(public TiketService: TiketService) {}

    @Get('jumlah-technician')
    getJumlahTechnician(){
        return this.TiketService.CountTechnician();
    }
    @Get()
    homeTiket() {
        return 'Kamu berhasil masuk ke halaman tiket'
    }
    @Get('data')
    getDataTiket(){
        return this.TiketService.LihatData();
    }
    @Get('jumlah-tiket')
    getJumlahTiket(){
        return this.TiketService.CountAllData()
    }
    @Get('jumlah-closed')
    getJumlahClosed(){
        return this.TiketService.CountDataClosed();
    }
    @Get('list-closed')
    getListClosed(){
        return this.TiketService.ListDataClosed();
    }
    @Get('jumlah-canceled')
    getJumlahCanceled(){
        return this.TiketService.CountDataCanceled();
    }
    @Get('list-canceled')
    getListCanceled(){
        return this.TiketService.ListDataCanceled();
    }
    @Get('jumlah-approved')
    getJumlahApproved(){
        return this.TiketService.CountDataApproved();
    }
    @Get('list-approved')
    getListApproved(){
        return this.TiketService.ListDataApproved();
    }
    @Get('jumlah-incident')
    getJumlahIncident(){
        return this.TiketService.CountDataIncident();
    }
    @Get('list-incident')
    getListIncident(){
        return this.TiketService.ListDataIncident();
    }
    @Get('jumlah-request')
    getJumlahRequest(){
        return this.TiketService.CountDataRequest();
    }
    @Get('list-request')
    getListRequest(){
        return this.TiketService.ListDataRequest();
    }
    @Get('SLAPoints')
    getSLAPoints(){
        return this.TiketService.CountSLAPoints();
    }
    @Get('IncidentClosed')
    getIncidentClosed(){
        return this.TiketService.CountIncidentClosed();
    }
    @Get('RequestClosed')
    getRequestClosed(){
        return this.TiketService.CountRequestClosed();
    }
    @Get('RequestCanceled')
    getRequestCanceled(){
        return this.TiketService.CountRequestCanceled();
    }
    @Get('IncidentCanceled')
    getIncidentCanceled(){
        return this.TiketService.CountIncidentCanceled();
    }
    @Get(':id')
    getDataTiketByData(@Param('id')id:number){
        return this.TiketService.LihatPerData(id);
    }
    @Post()
    postDataTiket(@Body() data : dtoTiket){
        return this.TiketService.CreateData(data);
    }
    @Put(':id')
    updateDataTiket(@Param('id')id:number,@Body()data:Partial<dtoTiket>){
        return this.TiketService.UpdateData(id,data);
    }
    @Delete(':id')
    deleteDataTiket(@Param('id')id:number){
        return this.TiketService.DeleteData(id);
    }
    
}
