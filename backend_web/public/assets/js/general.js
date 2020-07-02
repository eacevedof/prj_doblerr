console.log("general.js")

const pr = (v,t) => {
    const str = JSON.stringify(v);
    alert(`${t}\n:${str}`)
}

const get_slug = ()=>{
    const parts = window.location.pathname.split("/")
    const slugquery = parts[parts.length-1]
    const slug = slugquery.split("?")
    return slug[0] ?? ""
}