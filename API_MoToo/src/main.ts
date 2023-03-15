import 'dotenv/config';
import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import { Logger } from '@nestjs/common/services';

const port = process.env.PORT;
const database = process.env.DB_HOST;

async function bootstrap() {
  const app = await NestFactory.create(AppModule);
  await app.listen(port);

  Logger.log(`menggunakan localhost:${port}`,'Running Port');
  Logger.log(`menggunakan database:${database}`,'Running Database');
  Logger.log(`server API sudah berjalan`,`Running API`);
}
bootstrap();
