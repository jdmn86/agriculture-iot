import { Database } from '@vuex-orm/core'
import Auth from '@/models/Auth'
import User from '@/models/User'
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Plant from '@/models/Plant'
import Company from '@/models/Company'

const database = new Database()


database.register(User)
database.register(Auth)
database.register(Farm)
database.register(Terrain)
database.register(Plant)
database.register(Company)

export default database  