import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Any, Repository } from 'typeorm';
import { dtoTiket } from './tiket.dto';
import {data_tiket_csv} from './tiket.entity'

@Injectable()
export class TiketService {

    constructor(
        @InjectRepository(data_tiket_csv)
        protected dataTiket : Repository <data_tiket_csv>
    ){}

    async LihatData () {
        return this.dataTiket.find();
    }

    async LihatPerData(Request_ID : number){
        try{
            const tiket = await this.dataTiket.findOneOrFail({where: {Request_ID}})
            return tiket;
        } catch(err){
            throw err;
        }
    }

    async CreateData(data : dtoTiket) {
        const dataTiketBaru = this.dataTiket.create(data);
        await this.dataTiket.save(dataTiketBaru)
        return dataTiketBaru
    }

    async UpdateData(Request_ID: number, data : Partial <dtoTiket>){
        return this.dataTiket.update({Request_ID},data)
    }

    async DeleteData(Request_ID:number){
        await this.dataTiket.delete({Request_ID})
        return {status : true}
    }

    async CountAllData(){
        const totalTiket = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)","totaltiket")
        .getRawOne()
        return (totalTiket);
    }
    
    async CountDataClosed(){
        const totalClosed = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalclosed")
        .where("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Closed"})
        .getRawOne();
        return (totalClosed);
    }

    async CountTechnician(){
        const totalTechnician = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("data_tiket_csv.Technician,COUNT(*)", "totalTechnician")
        .groupBy("data_tiket_csv.Technician")
        .orderBy("COUNT(*)","DESC")
        .getRawMany();
        return (totalTechnician);
    }

    async ListDataClosed(){
        const listClosed = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .where("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Closed"})
        .getRawMany()
        return (listClosed);
    }

    async CountDataCanceled(){
        const totalCanceled = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalCanceled")
        .where("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Canceled"})
        .getRawOne();
        return (totalCanceled);
    }

    async ListDataCanceled(){
        const listCanceled = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .where("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Canceled"})
        .getRawMany()
        return (listCanceled);
    }

    async CountDataApproved(){
        const totalApproved = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalApproved")
        .where("data_tiket_csv.Approval_Status = :Approval_Status", {Approval_Status: "Approved"})
        .getRawOne();
        return (totalApproved);
    }

    async ListDataApproved(){
        const listApproved = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .where("data_tiket_csv.Approval_Status = :Approval_Status", {Approval_Status: "Approved"})
        .getRawMany()
        return (listApproved);
    }
    async CountDataIncident(){
        const totalIncident = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalIncident")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Incident"})
        .getRawOne();
        return (totalIncident);
    }

    async ListDataIncident(){
        const listIncident = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Incident"})
        .getRawMany()
        return (listIncident);
    }
    async CountDataRequest(){
        const totalRequest = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalRequest")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Request"})
        .getRawOne();
        return (totalRequest);
    }

    async ListDataRequest(){
        const listRequest = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Request"})
        .getRawMany()
        return (listRequest);
    }
    
    async CountIncidentClosed(){
        const totalIncidentClosed = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalPoints")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Incident"})
        .andWhere("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Closed"})
        .getRawOne();
        return (totalIncidentClosed);
    }

    async CountRequestClosed(){
        const totalIncidentClosed = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalPoints")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Request"})
        .andWhere("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Closed"})
        .getRawOne();
        return (totalIncidentClosed);
    }

    async CountRequestCanceled(){
        const totalRequestCanceled = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalPoints")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Request"})
        .andWhere("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Canceled"})
        .getRawOne();
        return (totalRequestCanceled);
    }

    async CountIncidentCanceled(){
        const totalIncidentCanceled = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalPoints")
        .where("data_tiket_csv.Request_Type = :Request_Type", {Request_Type: "Incident"})
        .andWhere("data_tiket_csv.Request_Status = :Request_Status", {Request_Status: "Canceled"})
        .getRawOne();
        return (totalIncidentCanceled);
    }
    
    async CountSLAPoints(){
        const totalPoints = await this.dataTiket
        .createQueryBuilder("data_tiket_csv")
        .select("COUNT(*)", "totalPoints")
        .where("data_tiket_csv.DueBy_Time = data_tiket_csv.SLA_Time")
        .getRawOne();
        return (totalPoints);
    }

}