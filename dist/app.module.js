"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.AppModule = void 0;
const common_1 = require("@nestjs/common");
const app_controller_1 = require("./app.controller");
const app_service_1 = require("./app.service");
const typeorm_1 = require("@nestjs/typeorm");
const data_admin_module_1 = require("./data-admin/data-admin.module");
require("dotenv/config");
const data_admin_entity_1 = require("./data-admin/data-admin.entity");
const data_member_entity_1 = require("./data-admin/data-member.entity");
const data_layanan_module_1 = require("./data-layanan/data-layanan.module");
const data_layanan_entity_1 = require("./data-layanan/data-layanan.entity");
const tiket_module_1 = require("./tiket/tiket.module");
const tiket_entity_1 = require("./tiket/tiket.entity");
const task_entity_1 = require("./task/task.entity");
const task_module_1 = require("./task/task.module");
let AppModule = class AppModule {
};
AppModule = __decorate([
    (0, common_1.Module)({
        imports: [
            typeorm_1.TypeOrmModule.forRoot({
                type: 'mysql',
                host: process.env.DB_HOST,
                port: parseInt(process.env.DB_PORT),
                username: process.env.DB_USERNAME,
                password: process.env.DB_PASSWORD,
                database: process.env.DB_DATABASE,
                synchronize: true,
                dropSchema: false,
                entities: [data_admin_entity_1.Admin, data_member_entity_1.Member, data_layanan_entity_1.Layanan, tiket_entity_1.data_tiket_csv, task_entity_1.data_task_csv]
            }),
            data_admin_module_1.DataAdminModule,
            data_layanan_module_1.DataLayananModule,
            tiket_module_1.TiketModule,
            task_module_1.TaskModule,
        ],
        controllers: [app_controller_1.AppController],
        providers: [app_service_1.AppService],
    })
], AppModule);
exports.AppModule = AppModule;
//# sourceMappingURL=app.module.js.map