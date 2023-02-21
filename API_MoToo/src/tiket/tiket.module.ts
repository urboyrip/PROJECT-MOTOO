import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { TiketController } from './tiket.controller';
import { data_tiket_csv } from './tiket.entity';
import { TiketService } from './tiket.service';

@Module({
  imports : [TypeOrmModule.forFeature([data_tiket_csv])],
  controllers: [TiketController],
  providers: [TiketService]
})
export class TiketModule {}