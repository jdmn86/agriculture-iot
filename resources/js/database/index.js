import { Database } from '@vuex-orm/core'
import Auth from '@/models/Auth'
import User from '@/models/User'
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Plant from '@/models/Plant'
import PlantType from '@/models/PlantType'
import PlantStage from '@/models/PlantStage'
import Plague from '@/models/Plague'
import PlagueType from '@/models/PlagueType'
import PlantPlague from '@/models/PlantPlague'
import PlantPartsAnatomy from '@/models/PlantPartsAnatomy'
import PlaguePlantsPartsAnatomy from '@/models/PlaguePlantsPartsAnatomy'
import Company from '@/models/Company'
import Crop from '@/models/Crop'
import Product from '@/models/Product'
import ProductComposition from '@/models/ProductComposition'
import ProductType from '@/models/ProductType'



const database = new Database()

database.register(User)
database.register(Auth)
database.register(Terrain) 
database.register(Farm)

database.register(Plant)
database.register(PlantType)
database.register(PlantStage)

database.register(Plague)
database.register(PlagueType)

database.register(PlantPlague)
database.register(PlantPartsAnatomy)
database.register(PlaguePlantsPartsAnatomy)

database.register(Product)
database.register(ProductComposition)
database.register(ProductType)

database.register(Company)
database.register(Crop)

export default database   

