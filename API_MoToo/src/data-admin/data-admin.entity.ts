import { Entity, Column, PrimaryGeneratedColumn} from 'typeorm';

@Entity()
export class Admin{
    @PrimaryGeneratedColumn()
    id : number;

    @Column({length:200})
    nama_admin : string;

    @Column({length:20})
    no_hp : string;
}