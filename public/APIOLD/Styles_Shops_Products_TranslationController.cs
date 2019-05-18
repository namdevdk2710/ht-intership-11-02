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
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    public class Styles_Shops_Products_TranslationController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Shops_Products_Translation
        public IQueryable<Styles_Shops_Products_Translation> GetStyles_Shops_Products_Translation()
        {
            return db.Styles_Shops_Products_Translation;
        }

        // GET: api/Styles_Shops_Products_Translation/5
        [ResponseType(typeof(Styles_Shops_Products_Translation))]
        public IHttpActionResult GetStyles_Shops_Products_Translation(int id)
        {
            Styles_Shops_Products_Translation styles_Shops_Products_Translation = db.Styles_Shops_Products_Translation.Find(id);
            if (styles_Shops_Products_Translation == null)
            {
                return NotFound();
            }

            return Ok(styles_Shops_Products_Translation);
        }

        // PUT: api/Styles_Shops_Products_Translation/5
        [ResponseType(typeof(void))]
        public IHttpActionResult PutStyles_Shops_Products_Translation(int id, Styles_Shops_Products_Translation styles_Shops_Products_Translation)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            if (id != styles_Shops_Products_Translation.ID)
            {
                return BadRequest();
            }

            db.Entry(styles_Shops_Products_Translation).State = EntityState.Modified;

            try
            {
                db.SaveChanges();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!Styles_Shops_Products_TranslationExists(id))
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

        // POST: api/Styles_Shops_Products_Translation
        [ResponseType(typeof(Styles_Shops_Products_Translation))]
        public IHttpActionResult PostStyles_Shops_Products_Translation(Styles_Shops_Products_Translation styles_Shops_Products_Translation)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            db.Styles_Shops_Products_Translation.Add(styles_Shops_Products_Translation);
            db.SaveChanges();

            return CreatedAtRoute("DefaultApi", new { id = styles_Shops_Products_Translation.ID }, styles_Shops_Products_Translation);
        }

        // DELETE: api/Styles_Shops_Products_Translation/5
        [ResponseType(typeof(Styles_Shops_Products_Translation))]
        public IHttpActionResult DeleteStyles_Shops_Products_Translation(int id)
        {
            Styles_Shops_Products_Translation styles_Shops_Products_Translation = db.Styles_Shops_Products_Translation.Find(id);
            if (styles_Shops_Products_Translation == null)
            {
                return NotFound();
            }

            db.Styles_Shops_Products_Translation.Remove(styles_Shops_Products_Translation);
            db.SaveChanges();

            return Ok(styles_Shops_Products_Translation);
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }

        private bool Styles_Shops_Products_TranslationExists(int id)
        {
            return db.Styles_Shops_Products_Translation.Count(e => e.ID == id) > 0;
        }
    }
}