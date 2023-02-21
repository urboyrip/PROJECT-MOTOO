import { Body, Controller, Delete, Get, Param, Post, Put } from '@nestjs/common';
import { DataAdminService } from './data-admin.service';
import { dataBaru } from './data-admin.dto';

@Controller('data-admin')
export class DataAdminController {
    constructor(private DataAdminService: DataAdminService){}

    @Get()
    IniController(): string{
        return 'Ini masuknya ke Controller default';
    }

    @Post()
    NewRecord(@Body() data : dataBaru){
        return this.DataAdminService.create(data);
    }

    @Put(':id')
    EditRecord(@Param('id') id :number,@Body() data : Partial <dataBaru> ){
        return this.DataAdminService.update(id,data);
    }

    @Delete(':id')
    DeleteRecord(@Param('id')id :number){
        return this.DataAdminService.delete(id)
    }

    @Get('service')
    IniJugaController() {
        return this.DataAdminService.IniJugaService();
    }

    @Get('data')
    IniDataAdmin(){
        return this.DataAdminService.LihatData();
    }

    @Get(':id')
    IniCotrollerPerdata(@Param('id') id :number ) {
        return this.DataAdminService.LihatPerData(id)
    }

    @Get(':id')
    IniControllerID(@Param('id') id :string ) : string{
        return 'Ini masuknya ke Controller ID' + ',' + ' ini halaman ' + id;
    }

    @Get('service/iya')
    IniIkutController() {
        return this.DataAdminService.IniService();
    }
    
}
