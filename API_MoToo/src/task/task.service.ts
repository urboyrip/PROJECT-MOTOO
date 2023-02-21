import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { data_task_csv } from './task.entity';
import { dtoTask } from './task.dto';

@Injectable()
export class TaskService {
    
    constructor(
        @InjectRepository(data_task_csv)
        protected dataTask : Repository <data_task_csv>
    ){}

    async LihatData(){
        return this.dataTask.find();
    }

    async LihatPerData(Task_ID : number){
        try{
            const tiket = await this.dataTask.findOneOrFail({where: {Task_ID}})
            return tiket;
        } catch(err){
            throw err;
        }
    }

    async CreateData(data : dtoTask) {
        const dataTaskBaru = this.dataTask.create(data);
        await this.dataTask.save(dataTaskBaru)
        return dataTaskBaru
    }

    async UpdateData(Task_ID: number, data : Partial <dtoTask>){
        return this.dataTask.update({Task_ID},data)
    }

    async DeleteData(Task_ID:number){
        await this.dataTask.delete({Task_ID})
        return {status : true}
    }

    async CountAllData(){
        const totalTask = await this.dataTask
        .createQueryBuilder("data_task_csv")
        .select("COUNT(*)", "totalTask")
        .getRawOne()
        return (totalTask);

    }

    async CountSLAPoints(){
        const totalPoints = await this.dataTask
        .createQueryBuilder("data_task_csv")
        .select("COUNT(*)", "totalPoints")
        .where("data_task_csv.Overdue_Status = :Overdue_Status", {Overdue_Status:"FALSE"})
        .getRawOne()
        return (totalPoints);

    }

    async CountTaskClosed(){
        const totalClosed = await this.dataTask
        .createQueryBuilder('data_task_csv')
        .select("COUNT(*)", "totalClosed")
        .where("data_task_csv.Task_Status = :Task_Status", {Task_Status:"Closed"})
        .getRawOne()
        return (totalClosed);
    }

    async CountTechnician(){
        const totalTechnician = await this.dataTask
        .createQueryBuilder("data_task_csv")
        .select("data_task_csv.Technician, COUNT(*)", "totalTechnician")
        .groupBy("data_task_csv.Technician")
        .orderBy("COUNT(*)","DESC")
        .getRawMany();
        return (totalTechnician);
    }
}
