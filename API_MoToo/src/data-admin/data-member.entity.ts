import { Entity, Column, PrimaryGeneratedColumn} from 'typeorm';

@Entity()
export class Member{
    @PrimaryGeneratedColumn()
    id : number;

    @Column({length:200})
    nama_member: string;

    @Column({length:20})
    no_hp : string;
}