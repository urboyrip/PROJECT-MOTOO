import { Controller,Get,Param,Body,Put,Post } from '@nestjs/common';
import { TaskService } from './task.service';
import { dtoTask } from './task.dto';
import { Delete } from '@nestjs/common';

@Controller('task')
export class TaskController {
    constructor (private TaskService: TaskService){}

    @Get()
    homeTask(){
        return 'Kamu berhasil masuk ke halaman tiket'
    }
    @Get('data')
    getDataTask(){
        return this.TaskService.LihatData()
    }
    @Get('jumlah-task')
    getJumlahTask(){
        return this.TaskService.CountAllData()
    }
    @Get('jumlah-closed')
    getJumlahTaskClosed(){
        return this.TaskService.CountTaskClosed()
    }
    @Get('SLAPoints')
    getSLAPoints(){
        return this.TaskService.CountSLAPoints()
    }
    @Get('jumlah-technician')
    getJumlahTechnician(){
        return this.TaskService.CountTechnician();
    }
    @Get(':id')
    getDataTiketByData(@Param('id')id:number){
        return this.TaskService.LihatPerData(id);
    }
    @Post()
    postDataTiket(@Body() data : dtoTask){
        return this.TaskService.CreateData(data);
    }
    @Put(':id')
    updateDataTiket(@Param('id')id:number,@Body()data:Partial<dtoTask>){
        return this.TaskService.UpdateData(id,data);
    }
    @Delete(':id')
    deleteDataTiket(@Param('id')id:number){
        return this.TaskService.DeleteData(id);
    }
    
}
