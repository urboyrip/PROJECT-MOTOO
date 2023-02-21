import { TypeOrmModule } from '@nestjs/typeorm';
import { AppController } from 'src/app.controller';
import { AppService } from 'src/app.service';
import { Module } from '@nestjs/common';
import { Layanan } from './data-layanan.entity';

@Module({
    imports : [TypeOrmModule.forFeature([Layanan])],
    providers : [AppService],
    controllers : [AppController]
})
export class DataLayananModule {}



