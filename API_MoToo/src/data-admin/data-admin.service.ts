import { Injectable } from '@nestjs/common';
import {Get} from '@nestjs/common'
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Admin } from './data-admin.entity';
import { dataBaru } from './data-admin.dto';

@Injectable()
export class DataAdminService {

    constructor(
        @InjectRepository(Admin)
        protected dataAdmin : Repository <Admin>
    ){}

    async LihatData () {
        return this.dataAdmin.find();
    }

    async LihatPerData (id: number) {
        return this.dataAdmin.findOne({where: {id}})
    }

    async create(data : dataBaru) {
        const dataAdminBaru = this.dataAdmin.create(data);
        await this.dataAdmin.save(dataAdminBaru)
        return dataAdminBaru
    }

    async update(id:number, data : Partial <dataBaru>){
        return this.dataAdmin.update({id},data)
    }

    async delete(id:number){
        await this.dataAdmin.delete({id})
        return {status : true}
    }

    async IniJugaService () {
        return ' ini masuknya ke service';
    }
    
    @Get()
    IniService(): string {
        return 'ini masuknya juga ke service';
    }

}
