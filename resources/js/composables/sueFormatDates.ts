export function useLocalDate(date:string)
{
    return new Date(Date.parse(date)).toLocaleDateString('ru') 
}