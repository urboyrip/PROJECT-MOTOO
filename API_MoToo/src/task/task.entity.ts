import { Entity,Column, PrimaryColumn } from "typeorm";

@Entity()
export class data_task_csv{
    @Column()
    Change_ID : number;

    @Column()
    Request_ID : number;

    @PrimaryColumn()
    Task_ID : number;

    @Column({length : 6})
    Task_Status : string;

    @Column({length : 23})
    Task_Types : string;

    @Column({length : 29})
    Technician : string;

    @Column({length : 8})
    Start_Time : string;

    @Column({length : 5})
    Overdue_Status : string;

    @Column({length : 8})
    Scheduled_EndTime : string;

    @Column({length : 8})
    Scheduled_StartTime : string;

    @Column({length : 4})
    Request_Title : string;
}