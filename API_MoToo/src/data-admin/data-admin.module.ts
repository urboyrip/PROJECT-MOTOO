import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Admin } from './data-admin.entity';
import { AppController } from 'src/app.controller';
import { AppService } from 'src/app.service';
import { Member } from './data-member.entity';
import { DataAdminController } from './data-admin.controller';
import { DataAdminService } from './data-admin.service';

@Module({
    imports : [TypeOrmModule.forFeature([Admin,Member])],
    providers : [AppService, DataAdminService],
    controllers : [AppController, DataAdminController]

})
export class DataAdminModule {}
