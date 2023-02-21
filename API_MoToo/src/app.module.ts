import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { TypeOrmModule } from '@nestjs/typeorm';
import { DataAdminModule } from './data-admin/data-admin.module';
import 'dotenv/config';
import { Admin } from './data-admin/data-admin.entity';
import { Member } from './data-admin/data-member.entity';
import { DataLayananModule } from './data-layanan/data-layanan.module';
import { Layanan } from './data-layanan/data-layanan.entity';
import { TiketModule } from './tiket/tiket.module';
import { data_tiket_csv } from './tiket/tiket.entity';
import { data_task_csv } from './task/task.entity';
import { TaskModule } from './task/task.module';


@Module({
  imports: [
    TypeOrmModule.forRoot({
    type: 'mysql',
    host: process.env.DB_HOST,
    port: parseInt(process.env.DB_PORT),
    username: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE,
    synchronize: true,
    dropSchema : false,
    entities: [Admin,Member,Layanan,data_tiket_csv,data_task_csv]}),
    DataAdminModule,
    DataLayananModule,
    TiketModule,
    TaskModule,
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
