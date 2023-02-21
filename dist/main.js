"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
require("dotenv/config");
const core_1 = require("@nestjs/core");
const app_module_1 = require("./app.module");
const services_1 = require("@nestjs/common/services");
const port = process.env.PORT;
const database = process.env.DB_HOST;
async function bootstrap() {
    const app = await core_1.NestFactory.create(app_module_1.AppModule);
    await app.listen(port);
    services_1.Logger.log(`menggunakan localhost:${port}`, 'Running Port');
    services_1.Logger.log(`menggunakan database:${database}`, 'Running Database');
}
bootstrap();
//# sourceMappingURL=main.js.map