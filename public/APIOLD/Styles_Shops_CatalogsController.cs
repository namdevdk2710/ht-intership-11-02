using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
   [APIAPPAuthorizeAttribute]
    public class Styles_Shops_CatalogsController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Shops_Catalogs
        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs")]
        public HttpResponseMessage GetStyles_Shops_Catalogs()
        {
            try
            {
                var list = db.Styles_Shops_Catalogs.Where(d => d.ID_Parent == 0).ToList();
                foreach (Styles_Shops_Catalogs d in list)
                {
                    d.Image2 = "Thumb.ashx?s=400&file=/" + d.Image2;
                }
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                     HttpStatusCode.OK,
                     new RegisterResponseModel()
                     {
                         status = false,
                         data = "",
                         error_message = ex.Message
                     }
                 );
                return resp;
            }
        }

        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs/{idCatalog}/{top}")]
        public HttpResponseMessage GetStyles_Shops_Catalogs(int idCatalog, int top)
        {
            try
            {
                //  var ListChildCustom = from c in db.Styles_Shops_Catalogs
                //               where c.ID_Catalog == idCatalog
                //               select c;
                //  var a = ListChildCustom.ToList().FirstOrDefault().ListChild;
                //  string[] ListChildCustoms = ListChildCustom.ToList().FirstOrDefault().ListTreeInCatalog.ToString().Split(',');
                // string[] ListChildCustoms = ListChildCustom.ToList().FirstOrDefault().ListChild.ToString().Split('|');



                // var list = db.Styles_Shops_Catalogs.Where(d => ListChildCustoms.ToList().Contains(d.ID_Catalog.ToString())).Take(top).ToList();
               // var a = from c in db.Styles_Shops_Catalogs
              //               where c.ID_Parent == idCatalog && c.Active==true orderby c.Weight
              //          select c ;
               // var list = a.ToList();

                var list = db.Styles_Shops_Catalogs.Where(e => e.ID_Parent == idCatalog & e.Active == true).OrderBy(x => Guid.NewGuid()).Take(top).ToList();
                foreach (Styles_Shops_Catalogs d in list)
                {
                    d.Image2 = "Thumb.ashx?s=400&file=/" + d.Image2;
                }
                var resp = Request.CreateResponse<RegisterResponseModel>(
                        HttpStatusCode.OK,
                        new RegisterResponseModel()
                        {
                            status = true,
                            data = list,
                            error_message = ""
                        }
                        );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                     HttpStatusCode.OK,
                     new RegisterResponseModel()
                     {
                         status = false,
                         data = "",
                         error_message = ex.Message
                     }
                 );
                return resp;
            }
        }

        // PUT: api/Styles_Shops_Catalogs/5
        [ResponseType(typeof(void))]
        public IHttpActionResult PutStyles_Shops_Catalogs(int id, Styles_Shops_Catalogs styles_Shops_Catalogs)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            if (id != styles_Shops_Catalogs.ID_Catalog)
            {
                return BadRequest();
            }

            db.Entry(styles_Shops_Catalogs).State = EntityState.Modified;

            try
            {
                db.SaveChanges();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!Styles_Shops_CatalogsExists(id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }

            return StatusCode(HttpStatusCode.NoContent);
        }

        // POST: api/Styles_Shops_Catalogs
        [ResponseType(typeof(Styles_Shops_Catalogs))]
        public IHttpActionResult PostStyles_Shops_Catalogs(Styles_Shops_Catalogs styles_Shops_Catalogs)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            db.Styles_Shops_Catalogs.Add(styles_Shops_Catalogs);
            db.SaveChanges();

            return CreatedAtRoute("DefaultApi", new { id = styles_Shops_Catalogs.ID_Catalog }, styles_Shops_Catalogs);
        }

        // DELETE: api/Styles_Shops_Catalogs/5
        [ResponseType(typeof(Styles_Shops_Catalogs))]
        public IHttpActionResult DeleteStyles_Shops_Catalogs(int id)
        {
            Styles_Shops_Catalogs styles_Shops_Catalogs = db.Styles_Shops_Catalogs.Find(id);
            if (styles_Shops_Catalogs == null)
            {
                return NotFound();
            }

            db.Styles_Shops_Catalogs.Remove(styles_Shops_Catalogs);
            db.SaveChanges();

            return Ok(styles_Shops_Catalogs);
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }

        private bool Styles_Shops_CatalogsExists(int id)
        {
            return db.Styles_Shops_Catalogs.Count(e => e.ID_Catalog == id) > 0;
        }

        //Tìm kiếm danh mục sản phẩm
        // GET: api/GetStyles_Shops_Catalogs_By_Searchs/{key}/{top}
        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs_By_Searchs/{key}/{top}")]
        public HttpResponseMessage GetStyles_Shops_Catalogs_By_Searchs(string key, int top)
        {
            try
            {
            
                var list =
                    (from catalogT in db.Styles_Shops_Catalogs_Translation
                     join catalog in db.Styles_Shops_Catalogs
                     on catalogT.ID_Catalog equals catalog.ID_Catalog
                     where catalogT.CatalogName.Contains(key)
                     && catalog.Active == true
                     orderby catalog.Weight
                     select new {
                         catalogT.CatalogName ,
                         catalogT.Link_SEO
                     }
                     ).Take(top).ToList();


                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }
    }
}